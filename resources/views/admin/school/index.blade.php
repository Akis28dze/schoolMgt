@extends('layouts.app')

@section('title')
اعدادات المؤسسة | تسيير مدارس
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('school.update') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-school color-i"></i> بيانات المؤسسة </h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> اسم المؤسسة  </label>
                                                <input type="text" value="{{ $school->name }}" required
                                                       class="form-control"
                                                       name="schoolName">
                                            @error('schoolName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> الايمايل   </label>
                                                <input type="email" value="{{ $school->email }}" required
                                                       class="form-control"
                                                       name="email">
                
                                                       @error('email')
                                                           <small class="text-danger">{{ $message }}</small>
                                                       @enderror
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> الولاية </label>
                                               
                                                <select 
                                                        id="wilaya"
                                                        class="form-control"
                                                        name="wilaya" onchange="getDaiarsById()">
                                                    <option value="{{ $school->wilaya->id }}">
                                                        {{ $school->wilaya->name  }}
                                                    </option>  
                                                    
                                                    @foreach ($wilayas as $wilaya)
                                                        <option value="{{ $wilaya->id }}">
                                                            {{ $wilaya->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('wilaya')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput3"> الدائرة   </label>
                                                <select required
                                                        id="dairas"
                                                        class="form-control"
                                                        name="dairas">
                                                        <option value="{{ $school->dairas->id }}">
                                                            {{ $school->dairas->name  }}
                                                        </option> 

                                                </select>
                
                                                @error('dairas')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> الهاتف الثابت </label>
                                                <input type="text" value="{{ $school->fixed_phone  }}" required
                                                       class="form-control"
                                                       name="fixedPhone">
                
                                                       @error('fixedPhone')
                                                           <small class="text-danger">{{ $message }}</small>
                                                       @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput3"> الفاكس   </label>
                                                <input type="text" value="{{ $school->fax  }}" required
                                                       class="form-control"
                                                       name="fax">
                
                                                       @error('fax')
                                                           <small class="text-danger">{{ $message }}</small>
                                                       @enderror
                                            </div>
                                        </div>
                                    </div> 



                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="ft-x"></i> تراجع
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic form layout section end -->
    </div>
</div>

<script>
    function getDaiarsById(){
        var wilayaId = $("#wilaya").val();
        var url = "{{ url('dashboard/school/dairas/') }}/" + wilayaId;
 
        $.get(url, function(data, status){
            $("#dairas").html(data);
        });
    }
</script>

@endsection