<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CmsGroup Entity
 *
 * @property int $id
 * @property string $group_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $modifiedby
 * @property string|null $description
 *
 * @property \App\Model\Entity\CmsUser[] $cms_users
 */
class CmsGroup extends Entity
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
        'group_name' => true,
        'created' => true,
        'modified' => true,
        'modifiedby' => true,
        'description' => true,
        'cms_users' => true
    ];
}
