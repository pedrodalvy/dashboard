@extends('errors::layout')

@section('title', __('Serviço Indisponível'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Serviço Indisponível'))
