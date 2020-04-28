<div class="row mb-2">
    <div class="col-12 col-md-2 text-md-right">
        <span class="font-weight-bold">Curso: </span>
    </div>
    <div class="col-12 col-md-10">
        <input type="text" class="form-control" value="{{ $education->course }}" name="course"/>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 col-md-2 text-md-right">
        <span class="font-weight-bold">Instituição: </span>
    </div>
    <div class="col-12 col-md-10">
        <input type="text" class="form-control" value="{{ $education->establishment }}" name="establishment"/>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 col-md-2 text-md-right">
        <span class="font-weight-bold">Inicio: </span>
    </div>
    <div class="col-12 col-md-10">
        <input type="text" class="form-control" name="date_in" id="date_in"
            value="{{ $education->date_in ? formatDateBr($education->date_in) : ''}}"/>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 col-md-2 text-md-right">
        <span class="font-weight-bold">Fim: </span>
    </div>
    <div class="col-12 col-md-10">
        <input type="text" class="form-control" name="date_out" id="date_out"
            value="{{ $education->date_out ? formatDateBr($education->date_out) : ''}}"/>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 col-md-2 text-md-right">
        <span class="font-weight-bold">Descrição do Curso: </span>
    </div>
    <div class="col-12 col-md-10">
        <textarea name="course_resume" id="course_resume" class="form-control" 
            cols="30" rows="10">{{ $education->course_resume }}</textarea>
    </div>
</div>