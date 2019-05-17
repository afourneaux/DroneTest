<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CmsUsers Model
 *
 * @property \App\Model\Table\CmsGroupsTable|\Cake\ORM\Association\BelongsTo $CmsGroups
 * @property \App\Model\Table\MassExportQueueTable|\Cake\ORM\Association\HasMany $MassExportQueue
 *
 * @method \App\Model\Entity\CmsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\CmsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CmsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CmsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CmsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CmsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CmsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CmsUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CmsUsersTable extends Table
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

        $this->setTable('cms_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CmsGroups', [
            'foreignKey' => 'cms_group_id'
        ]);
        $this->hasMany('MassExportQueue', [
            'foreignKey' => 'cms_user_id'
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
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 525)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator
            ->scalar('password_question')
            ->maxLength('password_question', 200)
            ->allowEmptyString('password_question');

        $validator
            ->scalar('password_answer')
            ->maxLength('password_answer', 200)
            ->allowEmptyString('password_answer');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 255)
            ->allowEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->allowEmptyString('lastname');

        $validator
            ->scalar('modifiedby')
            ->maxLength('modifiedby', 10)
            ->allowEmptyString('modifiedby');

        $validator
            ->scalar('reset_key')
            ->maxLength('reset_key', 50)
            ->allowEmptyString('reset_key');

        $validator
            ->dateTime('last_login')
            ->allowEmptyDateTime('last_login');

        $validator
            ->integer('default_locale')
            ->requirePresence('default_locale', 'create')
            ->allowEmptyString('default_locale', false);

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['cms_group_id'], 'CmsGroups'));

        return $rules;
    }
}
