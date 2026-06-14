<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sinistro Entity
 *
 * @property int $id
 * @property int $contrato_id
 * @property string $tipo_evento
 * @property \Cake\I18n\Date $data_evento
 * @property \Cake\I18n\Date $data_abertura
 * @property string $status
 * @property string|null $valor_calculado
 * @property string|null $observacao
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Sinistro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'contrato_id' => true,
        'tipo_evento' => true,
        'data_evento' => true,
        'data_abertura' => true,
        'status' => true,
        'valor_calculado' => true,
        'observacao' => true,
        'created' => true,
        'modified' => true,
    ];
}
