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
namespace App\Database;

use Cake\Database\SqlserverCompiler;
/**
 * Responsible for compiling a Query object into its SQL representation
 * for SQL Server
 *
 * @internal
 */
class CustomSqlserverCompiler extends SqlserverCompiler
{

    /**
     * Helper function used to build the string representation of multiple JOIN clauses,
     * it constructs the joins list taking care of aliasing and converting
     * expression objects to string in both the table to be joined and the conditions
     * to be used.
     *
     * @param array $parts list of joins to be transformed to string
     * @param \Cake\Database\Query $query The query that is being compiled
     * @param \Cake\Database\ValueBinder $generator the placeholder generator to be used in expressions
     * @return string
     */
    protected function _buildJoinPart($parts, $query, $generator)
    {
        $joins = '';
        foreach ($parts as $join) {
            $subquery = $join['table'] instanceof Query || $join['table'] instanceof QueryExpression;
            if ($join['table'] instanceof ExpressionInterface) {
                $join['table'] = $join['table']->sql($generator);
            }

            if ($subquery) {
                $join['table'] = '(' . $join['table'] . ')';
            }

            $joins .= sprintf(' %s JOIN %s %s WITH(NOLOCK)', $join['type'], $join['table'], $join['alias']);
            if (isset($join['conditions']) && count($join['conditions'])) {
                $joins .= sprintf(' ON %s', $join['conditions']->sql($generator));
            } else {
                $joins .= ' ON 1 = 1';
            }
        }

        return $joins;
    }
}