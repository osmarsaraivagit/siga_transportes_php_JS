@extends('template.painel-manutencao')
@section('title', 'Painel Manutenção')
@section('content')
<?php
@session_start();
if (@$_SESSION['nivel_usuario'] != 2) {
    echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home da Manutenção
@endsection
