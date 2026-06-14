<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlanosPeculio Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $nome
 * @property string|null $descricao
 * @property string $tipo
 * @property string $valor_cobertura
 * @property string $percentual_contribuicao
 * @property int $carencia_meses
 * @property bool $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class PlanosPeculio extends Entity
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
        'codigo' => true,
        'nome' => true,
        'descricao' => true,
        'tipo' => true,
        'valor_cobertura' => true,
        'percentual_contribuicao' => true,
        'carencia_meses' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
    ];
}
