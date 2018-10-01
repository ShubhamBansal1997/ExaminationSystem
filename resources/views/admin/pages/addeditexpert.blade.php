
@extends('admin.app')
@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ isset($expert->id) ? "EDIT": "ENTER" }} EXPERT</h1>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Expert Details
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ URL::to('admin/addeditexpert')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="message">
                  @if(count($errors)>0)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <ul style="list-style: none;">
                      @foreach($error->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                </div>
                @if(\Session::has('flash_message'))
                  <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    {{ \Session::get('flash_message') }}
                  </div>
                @endif
                <div class="form-group">
                  <label>First Name</label>
                  <input class="form-control" value="{{isset($expert->first_name)?$expert->first_name: null}}" placeholder="First Name" type="text" name="first_name" />
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" value="{{isset($expert->last_name)?$expert->last_name: null}}" placeholder="Last Name" type="text" name="last_name" />
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" value="{{isset($expert->phone)?$expert->phone: null}}" placeholder="Phone" type="text" name="phone" />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" value="{{isset($expert->email)?$expert->email: null}}" placeholder="Email" type="text" name="email" />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" value="" placeholder="***************" type="password" name="password" />
                </div>
                <div class="form-group">
                  <label>Photo of Expert</label>
                  <input class="form-control"  type="file" name="photo_of_expert" />
                </div>
                <div class="form-group">
                  <label>ID Proof Number</label>
                  <input class="form-control" value="{{isset($expert->id_proof_number)?$expert->id_proof_number: null}}" placeholder="Id Proof Number" name="id_proof_number" />
                </div>
                <div class="form-group">
                  <label>ID Proof File</label>
                  <input class="form-control" type="file" name="id_proof_file" />
                </div>
                <div class="form-group">
                  <label>Expert Benefit Percentage</label>
                  <input class="form-control" value="{{isset($expert->expert_benefit_percentage)?$expert->expert_benefit_percentage: null}}" placeholder="Expert Benefit Percentage" name="expert_benefit_percentage" />
                </div>
                <div class="form-group">
                  <label>Tax Payment Gateway Charges (in %)</label>
                  <input class="form-control" value="{{isset($expert->tax_payment_gateway_charges)?$expert->tax_payment_gateway_charges: null}}" placeholder="Tax Payment Gateway Charges" name="tax_payment_gateway_charges" />
                </div>
                <div class="form-group">
                  <label>Duration</label>
                  <input class="form-control" value="{{isset($expert->duration)?$expert->duration: null}}" placeholder="Duration" name="duration" />
                </div>
                <div class="form-group">
                  <label>Bank Account Number</label>
                  <input class="form-control" value="{{isset($expert->bank_account_number)?$expert->bank_account_number: null}}" placeholder="Bank Account Number" name="bank_account_number" />
                </div>
                <div class="form-group">
                  <label>Bank IFSC Code</label>
                  <input class="form-control" value="{{isset($expert->bank_ifsc_code)?$expert->bank_ifsc_code: null}}" placeholder="Bank IFSC Code" name="bank_ifsc_code" />
                </div>
                <div class="form-group">
                  <label>Type of Account</label>
                  <input class="form-control" value="{{isset($expert->type_of_account)?$expert->type_of_account: null}}" placeholder="Type of Account" name="type_of_account" />
                </div>
                <div class="form-group">
                  <label>Days Available</label>
                  <input class="form-control" value="{{isset($expert->timing_available)?$expert->timing_available: null}}" placeholder="Days Available" name="timing_available" />
                </div>
                <div class="form-group">
                  <label>Timing Available</label>
                  <input class="form-control" value="{{isset($expert->timing_available)?$expert->timing_available: null}}" placeholder="Timing Available" name="timings" />
                </div>
                <div class="form-group">
                  <label>Rank In Various Exams</label>
                  <textarea class="form-control" name="rank_in_various_exams">{{isset($expert->rank_in_various_exams)?$expert->rank_in_various_exams: null}}</textarea>
                </div>
                <div class="form-group">
                  <label> College</label>
                  <input type="text" name="quote" class="form-control" value="{{ isset($expert->quote)?$expert->quote: null}}" />
                </div>
                <div class="form-group">
                  <label>Preferred Language</label>
                  <input type="text" name="preferred_language" class="form-control" value="{{ isset($expert->preferred_language)?$expert->preferred_language: null}}" />
                </div>
                <div class="form-group">
                  <label>Amount to be Paid</label>
                  <input type="text" name="amount_to_be_paid" class="form-control" value="{{ isset($expert->amount_to_be_paid)?$expert->amount_to_be_paid: null}}" />
                </div>
                <input type="hidden" value="{{ isset($expert->id)?$expert->id : null }}" name="id">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
