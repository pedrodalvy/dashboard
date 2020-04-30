@extends('errors::layout')

@section('title', __('Proíbido'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Proíbido'))
