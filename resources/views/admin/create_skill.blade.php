           
              
                <form class="card-body" action="{{ route('save_skill') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="multicol-username">اسم المهارة</label>
                    <input name="name"   type="text" id="multicol-username" class="form-control" placeholder="" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>              
                    @enderror
                  </div>
                
                  <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
               <label class="form-label" for="multicol-email"> المستوى</label>
                    <select name="level"   class="form-select item-details mb-2">
             
                
                        <option> متقدم</option>
                        <option> متوسط</option>
                        <option> ضعيف</option>
                    </select>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
           
              <div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-country">is active</label>
                <div class="col-sm-9">
                  <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                    
                    <option value="1">مفعل</option>
                    <option value="-1">معطل</option>
                  </select>
                </div>
              </div>
            </div>
            
                </div>
                
                
                <div class="pt-4">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  {{ csrf_field() }}
                  <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
              </form>