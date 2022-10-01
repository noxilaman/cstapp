 @extends('layouts.student')

 @section('content')
     <div class="content-wrapper">
         <div class="row">
             <div class="col-md-12 grid-margin">
                 <div class="row mb-3">
                     <h3>คุณสอบผ่าน แบบทดสอบ {{ $jclsection->jcl->lesson->name }}</h3>
                     <h3>ทบทวน คำตอบ</h3>
                 </div>
                 <a href="{{ url('/learns/lesson/' . $jclsection->jcl->id) }}" class='btn btn-success'>ย้อนกลับ</a>

                 @foreach ($jclquizs as $jclquiz)
                     <div class="card mb-3">
                         <div class="card-body">
                             <h5 class="card-title">{{ $jclquiz->quiz->name }}</h5>
                             {!! $jclquiz->quiz->desc !!}
                         </div>
                         <div class="card-body">

                             <h5 class="card-title">รายละเอียดคำตอบ</h5>
                             {!! $jclquiz->quiz->ans_desc !!}
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-body text-center">
                         <h3>สอบผ่าน</h3><br />
                         <button id="passblock" class="bth btn-success btn-lg">ทบทวนคำตอบ</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
         $('#passblock').on('click', () => {
             $('#exampleModal').modal('hide');
         });
         setTimeout(() => {
             $('#exampleModal').modal('show');
         }, 1000);
     </script>
 @endsection
