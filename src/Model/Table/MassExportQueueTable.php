<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MassExportQueue Model
 *
 * @property \App\Model\Table\CmsUsersTable|\Cake\ORM\Association\BelongsTo $CmsUsers
 *
 * @method \App\Model\Entity\MassExportQueue get($primaryKey, $options = [])
 * @method \App\Model\Entity\MassExportQueue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MassExportQueue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MassExportQueue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MassExportQueue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MassExportQueue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MassExportQueue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MassExportQueue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MassExportQueueTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mass_export_queue');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CmsUsers', [
            'foreignKey' => 'cms_user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('sql')
            ->allowEmptyString('sql');

        $validator
            ->scalar('params')
            ->allowEmptyString('params');

        $validator
            ->scalar('file_name')
            ->maxLength('file_name', 100)
            ->allowEmptyFile('file_name');

        $validator
            ->integer('queued')
            ->allowEmptyString('queued');

        $validator
            ->dateTime('email_sent')
            ->allowEmptyDateTime('email_sent');

        $validator
            ->scalar('result_msg')
            ->maxLength('result_msg', 100)
            ->allowEmptyString('result_msg');

        $validator
            ->integer('processed')
            ->allowEmptyString('processed');

        $validator
            ->integer('export_error')
            ->allowEmptyString('export_error');

        $validator
            ->integer('number_of_rows')
            ->allowEmptyString('number_of_rows');

        $validator
            ->integer('pid')
            ->allowEmptyString('pid');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cms_user_id'], 'CmsUsers'));

        return $rules;
    }
}
