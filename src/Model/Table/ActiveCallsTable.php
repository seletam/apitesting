<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActiveCalls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Calls
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ActiveCall get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActiveCall newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActiveCall[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActiveCall|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActiveCall patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActiveCall[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActiveCall findOrCreate($search, callable $callback = null, $options = [])
 */
class ActiveCallsTable extends Table
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

        $this->setTable('active_calls');

        $this->belongsTo('Calls', [
            'foreignKey' => 'call_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
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
        $rules->add($rules->existsIn(['call_id'], 'Calls'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
