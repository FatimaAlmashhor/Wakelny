<div class="card">
<div class="card-body">
<div class="table-responsive text-nowrap">
<table class="table table-bordered">
<thead>
<tr>
<th>#</th>
<th>اسم المستخدم</th>
<th>الايميل</th>



<th>الحالة</th>
<th>العمليات</th>
</tr>
</thead>
<tbody>

@foreach($skills as $skill)

<tr>
<td>{{$loop->iteration}}</td>
<td>{{$skill->name}}</td>
<td>{{$skill->email }}</td>

<td>
@if($skill->is_active == 1) 
<span class="badge bg-label-success me-1">مفعل</span>
@else
 <span class="badge bg-label-danger me-1">غير مفعل</span>
@endif
</td>
<td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('edit_skill',$skill->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                <a class="dropdown-item" href="{{ route('toggle_skill',$skill->id) }}"><i class="bx bx-trash me-2"></i> @if($skill->is_active==1)disable @else enable @endif</a>
              </div>
            </div>
</td>
</tr>

@endforeach

</tbody>
</table>
</div>
</div>
</div>
<!--/ Bordered Table -->
            