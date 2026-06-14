<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Associado Entity
 *
 * @property int $id
 * @property string $matricula
 * @property string $nome
 * @property string $cpf
 * @property string $patente
 * @property string $situacao
 * @property \Cake\I18n\Date $data_ingresso
 * @property \Cake\I18n\Date $data_nascimento
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\ContratosPeculio[] $contratos_peculio
 */
class Associado extends Entity
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
        'matricula' => true,
        'nome' => true,
        'cpf' => true,
        'patente' => true,
        'situacao' => true,
        'data_ingresso' => true,
        'data_nascimento' => true,
        'created' => true,
        'modified' => true,
        'contratos_peculio' => true,
    ];
}
