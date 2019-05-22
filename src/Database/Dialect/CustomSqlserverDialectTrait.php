<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Database\Dialect;

use Cake\Database\Dialect\SqlserverDialectTrait;
use Cake\Database\Expression\OrderByExpression;
use Cake\Database\Query;
use App\Database\CustomSqlserverCompiler;


/**
 * Contains functions that encapsulates the SQL dialect used by SQLServer,
 * including query translators and schema introspection.
 *
 * @internal
 */
trait CustomSqlserverDialectTrait
{

    use SqlserverDialectTrait;

    /**
     * {@inheritDoc}
     *
     * @return \App\Database\CustomSqlserverCompiler
     */
    public function newCompiler()
    {
        return new CustomSqlserverCompiler();
    }

    /**
     * Returns the passed query after rewriting the DISTINCT clause, so that drivers
     * that do not support the "ON" part can provide the actual way it should be done
     *
     * @param \Cake\Database\Query $original The query to be transformed
     * @return \Cake\Database\Query
     */
    protected function _transformDistinct($original)
    {
        if (!is_array($original->clause('distinct'))) {
            return $original;
        }

        $query = clone $original;
        $distinct = $query->clause('distinct');
        $orderby =$query->clause('order');

        $query->distinct(false);
        $query->order(false);

        $order = new OrderByExpression($orderby);
        
        $query
            ->select(function ($q) use ($distinct, $orderby) {
                $over = $q->newExpr('ROW_NUMBER() OVER')
                    ->add('(PARTITION BY')
                    ->add($q->newExpr()->add($distinct)->setConjunction(','))
                    ->add($orderby)
                    ->add(')')
                    ->setConjunction(' ');

                return [
                    '_cake_distinct_pivot_' => $over
                ];
            })
            ->limit(null)
            ->offset(null)
            ->order([], true);

        $outer = new Query($query->getConnection());
        $outer->select('*')
            ->from(['_cake_distinct_' => $query])
            ->where(['_cake_distinct_pivot_' => 1]);

        // Decorate the original query as that is what the
        // end developer will be calling execute() on originally.
        $original->decorateResults(function ($row) {
            if (isset($row['_cake_distinct_pivot_'])) {
                unset($row['_cake_distinct_pivot_']);
            }

            return $row;
        });

        return $outer;
    }

}