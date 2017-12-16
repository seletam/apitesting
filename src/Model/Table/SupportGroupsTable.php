<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupportGroups Model
 *
 * @method \App\Model\Entity\SupportGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupportGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupportGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupportGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupportGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupportGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupportGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class SupportGroupsTable extends Table
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

        $this->setTable('support_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
