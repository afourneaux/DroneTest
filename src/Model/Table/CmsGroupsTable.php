<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CmsGroups Model
 *
 * @property \App\Model\Table\CmsUsersTable|\Cake\ORM\Association\HasMany $CmsUsers
 *
 * @method \App\Model\Entity\CmsGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\CmsGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CmsGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CmsGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CmsGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CmsGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CmsGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CmsGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CmsGroupsTable extends Table
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

        $this->setTable('cms_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CmsUsers', [
            'foreignKey' => 'cms_group_id'
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
            ->scalar('group_name')
            ->maxLength('group_name', 255)
            ->requirePresence('group_name', 'create')
            ->allowEmptyString('group_name', false);

        $validator
            ->scalar('modifiedby')
            ->maxLength('modifiedby', 10)
            ->allowEmptyString('modifiedby');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        return $validator;
    }
}
