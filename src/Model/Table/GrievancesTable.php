<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grievances Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Location
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Grievance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grievance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grievance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grievance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grievance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grievance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grievance findOrCreate($search, callable $callback = null, $options = [])
 */
class GrievancesTable extends Table
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

        $this->setTable('grievances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Location', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('description');

        $validator
            ->dateTime('created_date')
            ->allowEmpty('created_date');

        $validator
            ->dateTime('modified_date')
            ->allowEmpty('modified_date');

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
        $rules->add($rules->existsIn(['location_id'], 'Location'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
