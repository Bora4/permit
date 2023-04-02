<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permits Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Permit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permit findOrCreate($search, callable $callback = null, $options = [])
 */
class PermitsTable extends Table
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

        $this->setTable('permits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('startdate')
            ->requirePresence('startdate', 'create')
            ->notEmpty('startdate');

        $validator
            ->dateTime('enddate')
            ->requirePresence('enddate', 'create')
            ->notEmpty('enddate');

        $validator
            ->scalar('reason')
            ->maxLength('reason', 50)
            ->requirePresence('reason', 'create')
            ->notEmpty('reason');

        $validator
            ->scalar('visitedcustomer')
            ->maxLength('visitedcustomer', 50)
            ->allowEmpty('visitedcustomer');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
