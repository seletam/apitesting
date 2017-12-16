<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Call Entity
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $description
 * @property int $priority
 * @property int $status
 * @property \Cake\I18n\Time $creation_date
 * @property \Cake\I18n\Time $modified_date
 * @property int $group_id
 *
 * @property \App\Model\Entity\SupportGroup $support_group
 * @property \App\Model\Entity\ActiveCall[] $active_calls
 */
class Call extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
