<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Beneficiario Entity
 *
 * @property int $id
 * @property int $contrato_id
 * @property string $nome
 * @property string $cpf
 * @property string $parentesco
 * @property string $percentual
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Beneficiario extends Entity
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
        'nome' => true,
        'cpf' => true,
        'parentesco' => true,
        'percentual' => true,
        'created' => true,
        'modified' => true,
    ];
}
