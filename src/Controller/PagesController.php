<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }

        if ($path[0] === 'home') {
            return $this->dashboard();
        }

        $page = $subpage = null;
        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function dashboard(): ?Response
    {
        $associadosTable = $this->fetchTable('Associados');
        $contratosTable = $this->fetchTable('ContratosPeculio');
        $sinistrosTable = $this->fetchTable('Sinistros');
        $contribuicoesTable = $this->fetchTable('Contribuicoes');

        // Totais para o dashboard
        $totalAssociadosAtivos = $associadosTable->find()
            ->where(['situacao' => 'ativo'])
            ->count();

        $totalContratosVigentes = $contratosTable->find()
            ->where(['status' => 'vigente'])
            ->count();

        $totalSinistrosAbertos = $sinistrosTable->find()
            ->where(['status IN' => ['aberto', 'em_analise']])
            ->count();

        $totalContribuicoesPendentes = $contribuicoesTable->find()
            ->where(['status IN' => ['pendente', 'atrasada']])
            ->count();
            
                
        
        $this->set(compact(
            'totalAssociadosAtivos',
            'totalContratosVigentes',
            'totalSinistrosAbertos',
            'totalContribuicoesPendentes'
        ));

        return $this->render('home');
    }
}