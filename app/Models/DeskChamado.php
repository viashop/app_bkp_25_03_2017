<?php

class DeskChamado extends Model
{
    /* solicitante_id é chave estrangeira da tabela 'chamados' que faz referência à id da tabela 'users' */
    public function solicitante(){
        return $this->belongsTo(User::class, 'solicitante_id');
    }

    /* atendente_id é chave estrangeira da tabela 'chamados' que faz referência à id da tabela 'users' */
    public function atendente(){
        return $this->belongsTo(User::class, 'atendente_id');
    }

}
