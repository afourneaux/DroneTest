<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MassExportQueue Entity
 *
 * @property int $id
 * @property int $cms_user_id
 * @property string|null $sql
 * @property string|null $params
 * @property string|null $file_name
 * @property int|null $queued
 * @property \Cake\I18n\FrozenTime|null $email_sent
 * @property string|null $result_msg
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $processed
 * @property int|null $export_error
 * @property int|null $number_of_rows
 * @property int|null $pid
 *
 * @property \App\Model\Entity\CmsUser $cms_user
 */
class MassExportQueue extends Entity
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
        'cms_user_id' => true,
        'sql' => true,
        'params' => true,
        'file_name' => true,
        'queued' => true,
        'email_sent' => true,
        'result_msg' => true,
        'created' => true,
        'processed' => true,
        'export_error' => true,
        'number_of_rows' => true,
        'pid' => true,
        'cms_user' => true
    ];
}
