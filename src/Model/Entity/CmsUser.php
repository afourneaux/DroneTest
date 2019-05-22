<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CmsUser Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $password_question
 * @property string|null $password_answer
 * @property string $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $modifiedby
 * @property int|null $cms_group_id
 * @property string|null $reset_key
 * @property \Cake\I18n\FrozenTime|null $last_login
 * @property int $default_locale
 *
 * @property \App\Model\Entity\CmsGroup $cms_group
 * @property \App\Model\Entity\MassExportQueue[] $mass_export_queue
 */
class CmsUser extends Entity
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
        'username' => true,
        'password' => true,
        'password_question' => true,
        'password_answer' => true,
        'email' => true,
        'firstname' => true,
        'lastname' => true,
        'created' => true,
        'modified' => true,
        'modifiedby' => true,
        'cms_group_id' => true,
        'reset_key' => true,
        'last_login' => true,
        'default_locale' => true,
        'cms_group' => true,
        'mass_export_queue' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
