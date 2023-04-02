<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $tckn
 * @property int $personnelno
 * @property string $address
 * @property int $permitleft
 * @property int $permitused
 *
 * @property \App\Model\Entity\Permit[] $permits
 */
class User extends Entity
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
        'name' => true,
        'surname' => true,
        'tckn' => true,
        'personnelno' => true,
        'address' => true,
        'permitleft' => true,
        'permitused' => true,
        'permits' => true
    ];
}
