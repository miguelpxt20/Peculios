<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contribuico Entity
 *
 * @property int $id
 * @property int $contrato_id
 * @property \Cake\I18n\Date $competencia
 * @property string $valor
 * @property string $status
 * @property \Cake\I18n\Date|null $data_pagamento
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Contribuico extends Entity
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
        'competencia' => true,
        'valor' => true,
        'status' => true,
        'data_pagamento' => true,
        'created' => true,
        'modified' => true,
    ];
}
