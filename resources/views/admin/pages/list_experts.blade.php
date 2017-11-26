@extends('admin.app')
@section('content')
<div v-if="loading" v-cloak>
    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
    <span>Loading...</span>
  </div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All Experts</h1>
                    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#create-expert" >Create Expert</button>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="panel-body">
                        </div>
                        </div>

                        <div class="panel-body">
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Id Proof</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach($experts as $i => $expert)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $expert->first_name }} {{ $expert->last_name }}</td>
                                      <td>{{ $expert->phone_number }}</td>
                                      <td>{{ $expert->email_id }}</td>
                                      <td><a href="{{ URL::to('images/id_proof_expert/') }}/{{$expert->id_proof_file}}" target="_blank">{{ $expert->id_proof_number }}</td>

                                      <td>
                                      <button data-id="{{ $expert->id }}" class="btn btn-xs btn-default"
                                        v-on:click.prevent="addDescription($event)">DESCRIPTION</button>
                                      <button data-id="{{ $expert->id }}" v-on:click.prevent="deleteExpert($event)" class="btn btn-xs btn-danger">DELETE</button>
                                      <button data-id="{{ $expert->id }}" v-on:click.prevent="editExpert($event)" class="btn btn-xs btn-warning">EDIT</button>
                                      </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <!-- create expert modal -->
                            <div class="modal fade" id="create-expert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Create Expert</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createExpert" id="myForm">

                                          <div class="form-group">
                                            <label for="first_name">First Name:</label>
                                            <input type="text" name="first_name" class="form-control" v-model="newExpert.first_name" />
                                            <span v-if="formErrors['first_name']" class="error text-danger">@{{ formErrors['first_name'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="last_name">Last Name:</label>
                                            <input type="text" name="last_name" class="form-control" v-model="newExpert.last_name" />
                                            <span v-if="formErrors['last_name']" class="error text-danger">@{{ formErrors['last_name'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="email_id">Email Id:</label>
                                            <input type="text" name="email_id" class="form-control" v-model="newExpert.email_id" />
                                            <span v-if="formErrors['email_id']" class="error text-danger">@{{ formErrors['email_id'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="phone_number">Phone Number:</label>
                                            <input type="text" name="phone_number" class="form-control" v-model="newExpert.phone_number" />
                                            <span v-if="formErrors['phone_number']" class="error text-danger">@{{ formErrors['phone_number'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" class="form-control" v-model="newExpert.password" />
                                            <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="id_proof_number">Id Proof Number:</label>
                                            <input type="text" name="id_proof_number" class="form-control" v-model="newExpert.id_proof_number" />
                                            <span v-if="formErrors['id_proof_number']" class="error text-danger">@{{ formErrors['id_proof_number'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="id_proof_file">ID Proof File:</label>
                                            <input type="file" name="id_proof_file" class="form-control" v-model="newExpert.id_proof_file" />
                                            <span v-if="formErrors['id_proof_file']" class="error text-danger">
                                            @{{ formErrors['id_proof_file'] }}</span>
                                          </div>
                                          <div class="form-group">
                                            <label for="neet_rank">Neet Rank</label>
                                            <input type="text" name="neet_rank" class="form-control" v-model="newExpert.neet_rank" />
                                            <span v-if="formErrors['neet_rank']" class="error text-danger">@{{ formError['neet_rank'] }}</span>
                                          </div>

                                          <div class="form-group">
                                            <label for="aiims_rank">AIIMS Rank</label>
                                            <input type="text" name="aiims_rank" class="form-control" v-model="newExpert.aiims_rank" />
                                            <span v-if="formErrors['aiims_rank']" class="error text-danger">@{{ formError['aiims_rank'] }}</span>
                                          </div>

                                    <div class="form-group">
                                      <button type="submit" class="btn btn-success">Submit</button>
                                    </div>

                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end of the add expert modal -->
                              <!-- Edit Item Modal -->
                                  <div class="modal fade" id="edit-expert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Edit Expert</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form id="myForm2" method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateExpert(fillExpert.id)">

                                              <div class="form-group">
                                                <label for="first_name">First Name:</label>
                                                <input type="text" name="first_name" class="form-control" value="@{{ fillExpert['first_name']}}">
                                                <span v-if="formErrorsUpdate['first_name']" class="error text-danger">@{{ formErrorsUpdate['title'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="last_name">Last Name:</label>
                                                <input type="text" name="last_name" class="form-control" value="@{{fillExpert['last_name']}}" />
                                                <span v-if="formErrors['last_name']" class="error text-danger">@{{ formErrors['last_name'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="email_id">Email Id:</label>
                                                <input type="text" name="email_id" class="form-control" value="@{{fillExpert['email_id']}}" />
                                                <span v-if="formErrors['email_id']" class="error text-danger">@{{ formErrors['email_id'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="phone_number">Phone Number:</label>
                                                <input type="text" name="phone_number" class="form-control" value="@{{fillExpert['phone_number']}}" />
                                                <span v-if="formErrors['phone_number']" class="error text-danger">@{{ formErrors['phone_number'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" name="password" class="form-control" />
                                                <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="id_proof_number">Id Proof Number:</label>
                                                <input type="text" name="id_proof_number" class="form-control" value="@{{fillExpert['id_proof_number']}}" />
                                                <span v-if="formErrors['id_proof_number']" class="error text-danger">@{{ formErrors['id_proof_number'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="id_proof_file">ID Proof File:</label>
                                                <input type="file" name="id_proof_file" class="form-control" />
                                                <span v-if="formErrors['id_proof_file']" class="error text-danger">
                                                @{{ formErrors['id_proof_file'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="neet_rank">Neet Rank</label>
                                                <input type="text" name="neet_rank" class="form-control" value="@{{ fillExpert['neet_rank'] }}" />
                                                <span v-if="formErrors['neet_rank']" class="error text-danger">@{{ formError['neet_rank'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="aiims_rank">AIIMS Rank</label>
                                                <input type="text" name="aiims_rank" class="form-control" value="@{{ fillExpert['aiims_rank'] }}" />
                                                <span v-if="formErrors['aiims_rank']" class="error text-danger">@{{ formError['aiims_rank'] }}</span>
                                              </div>
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                            </form>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- end of the edit expert modal -->
                                  <!-- add  Expert Description Modal -->
                                  <div class="modal fade" id="add-descrption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Expert Description</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form id="myForm3" method="POST" enctype="multipart/form-data" v-on:submit.prevent="submitDescription">
                                              <div class="form-group">
                                                <input type="hidden" name="expert_id" class="form-control"
                                                  v-model="@{{ ExpertDescrption['expert_id'] }}" value="@{{ id }}" hidden>
                                              </div>

                                              <div class="form-group">
                                                <label for="profile_pic">Profile Pic:</label>
                                                <input type="file" name="profile_pic" class="form-control"
                                                  value="@{{ExpertDescrption['profile_pic']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['profile_pic']">@{{ formErrorsDescrption['profile_pic'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="benefit_percentage">Benefit Percentage:</label>
                                                <input type="text" name="benefit_percentage" class="form-control"
                                                  value="@{{ExpertDescrption['benefit_percentage']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['benefit_percentage']">@{{ formErrorsDescrption['benefit_percentage'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="bank_account_number">Bank Account Number:</label>
                                                <input type="text" name="bank_account_number" class="form-control"
                                                  value="@{{ExpertDescrption['bank_account_number']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['bank_account_number']">@{{formErrorsDescrption['bank_account_number']</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="bank_ifsc_code">Bank IFSC Code:</label>
                                                <input type="text" name="bank_ifsc_code" class="form-control"
                                                  value="@{{ExpertDescrption['bank_ifsc_code']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['bank_ifsc_code']">@{{ formErrorsDescrption['bank_ifsc_code'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="bank_type">Bank Account Type:</label>
                                                <select name="bank_type" class="form-control"
                                                  value="@{{ExpertDescrption['bank_type']}}">
                                                  <option value='0'>SAVINGS</option>
                                                  <option value='1'>CURRENT</option>
                                                </select>
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['bank_type']">@{{ formErrorsDescrption['bank_type'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="quote">Quote:</label>
                                                <textarea name="quote" class="form-control"
                                                  value="@{{ExpertDescrption['quote']}}" ></textarea>
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['quote']">@{{ formErrorsDescrption['quote'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="preferred_language">Preferred Language:</label>
                                                <input type="text" name="preferred_language" class="form-control"
                                                  value="@{{ExpertDescrption['preferred_language']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['preferred_language']">@{{ formErrorDescrption['preferred_language'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="charges">Charges:</label>
                                                <input type="text" name="charges" class="form-control"
                                                  value="@{{ExpertDescrption['charges']}}" />
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['charges']">@{{ formErrorsDescrption['charges'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="details">Details:</label>
                                                <textarea name="details" class="form-control"
                                                  value="@{{ ExpertDescrption['details'] }}" ></textarea>
                                                <span class="error text-danger"
                                                  v-if="formErrorsDescrption['details']">@{{ formsErrorsDescrption['details'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="details">Availability:</label>
                                                <div class="row">
                                                  <div class="col-sm-4 nopadding">
                                                  <b>Day</b>
                                                  </div>
                                                  <div class="col-sm-4 nopadding">
                                                  <b>Start Time </b>
                                                  </div>
                                                  <div class="col-sm-4 nopadding">
                                                  <b>End Time</b>
                                                  </div>
                                                </div>
                                              </div>
                                              <div id="availability_fields">
                                              </div>
                                              <div class="row">
                                              <div class="col-sm-4 nopadding">
                                                <div class="form-group">
                                                  <input type="text" class="form-control" id="day" name="days[]" value="" placeholder="Day">
                                                </div>
                                              </div>
                                              <div class="col-sm-4 nopadding">
                                                <div class="form-group">
                                                  <input type="time" class="form-control" id="start" name="start_time[]" value="" placeholder="Start Time">
                                                </div>
                                              </div>
                                              <div class="col-sm-4 nopadding">
                                                <div class="form-group">
                                                  <div class="input-group">
                                                    <input type="time" class="form-control" id="end_time" name="end_time[]" value="" placeholder="End Time">
                                                    <div class="input-group-btn">
                                                      <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="clear"></div>
                                              </div>
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>

                                            </form>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- end of the add expert description modal -->

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
  var room = 1;
function education_fields() {

    room++;
    var objTo = document.getElementById('availability_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass"+room);
  var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-4 nopadding"><div class="form-group"><input type="text" class="form-control" id="day" name="days[]" value="" placeholder="Day"></div></div><div class="col-sm-4 nopadding"><div class="form-group"><input type="time" class="form-control" id="start" name="start_time[]" value="" placeholder="Start Time"></div></div><div class="col-sm-4 nopadding"><div class="form-group"><div class="input-group"><input type="time" class="form-control" id="end_time" name="end_time[]" value="" placeholder="End Time"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div></div>';

    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
     $('.removeclass'+rid).remove();
   }
</script>

<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
Vue.http.options.emulateJSON = true;
Vue.http.interceptors.push((request, next) => {
    next((response) => {
    // modify response
    response.data = response.json()
  })
})
new Vue({
  el: 'body',

  data: {
    experts: [],
    formErrors:{},
    formErrorsUpdate:{},
    formErrorsDescrption:{},
    newExpert: {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'', 'neet_rank':'', 'aiims_rank':'' },
    fillExpert: {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'','id':'', 'neet_rank':'', 'aiims_rank':'' },
    id: null,
    ExpertDescrption: {'expert_id':'', 'profile_pic':'', 'benefit_percentage':'', 'availability':'', 'bank_account_number':'', 'bank_ifsc_code':'', 'bank_type':'', 'quote':'', 'preferred_language':'', 'charges':'', 'details':''},
    loading: false,
  },

  methods: {
    createExpert: function(){
      var myForm = document.getElementById('myForm');
      formData = new FormData(myForm);
      console.log(formData);
      //var input = JSON.stringify(this.newExpert);
      this.$http.post('/admin/createexpert', formData).then((response) => {
          this.newExpert = {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'', 'neet_rank':'', 'aiims_rank':'' };
          $('#create-expert').modal('hide');
          toastr.success('Expert Created Successfully.', 'Success Alert', {timeOut: 5000});
          location.reload();
      }, (response) => {
          this.formErrors = response.data;
      });
    },

    deleteExpert: function(event){
      element = event.currentTarget
      id = element.getAttribute('data-id');
      this.$http.delete('/admin/deleteexpert/'+id).then((response) => {
        toastr.success('Expert  Deleted Successfully', 'Sucess Alert', {timeOut: 5000});
        location.reload();
      });
    },

    editExpert: function(event){
      element = event.currentTarget
      id = element.getAttribute('data-id');
      this.loading = true;
      this.$http.get('/admin/getexperts/'+id).then((response) => {
          //response.data = response.json();
          //console.log("data");
          //console.log(response.data.id);
          this.fillExpert.id = response.data.id;
          this.fillExpert.first_name = response.data.first_name;
          this.fillExpert.last_name = response.data.last_name;
          this.fillExpert.phone_number = response.data.phone_number;
          this.fillExpert.email_id = response.data.email_id;
          this.fillExpert.id_proof_number = response.data.id_proof_number;
          this.fillExpert.neet_rank = response.data.neet_rank;
          this.fillExpert.aiims_rank = response.data.aiims_rank;
          this.loading = false;
          $("#edit-expert").modal('show');
        });
      console.log(this.fillExpert);

    },

    updateExpert: function(id){
        var myForm = document.getElementById('myForm2');
        var formData = new FormData(myForm);
        console.log(formData);
        this.$http.post('/admin/updateexpert/'+id,formData).then((response) => {
            //this.changePage(this.pagination.current_page);
            this.fillExpert = {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'','id':'','neet_rank':'', 'aiims_rank':'' };
            toastr.success('Expert Updated Successfully.', 'Success Alert', {timeOut: 5000});
            location.reload();
          }, (response) => {
              this.formErrorsUpdate = response.data;
              console.log()
          });
      },
    addDescription: function(event){
      element = event.currentTarget
      this.id = element.getAttribute('data-id');
      $('#add-descrption').modal('show');
    },

    submitDescription: function(){
      var myForm = document.getElementById('myForm3');
      formData = new FormData(myForm);
      console.log(formData);

      //var input = JSON.stringify(this.newExpert);
      this.$http.post('/admin/addExpertDescription', formData).then((response) => {
          this.ExpertDescrption = {'expert_id':'', 'profile_pic':'', 'benefit_percentage':'', 'availability':'', 'bank_account_number':'', 'bank_ifsc_code':'', 'bank_type':'', 'quote':'', 'preferred_language':'', 'charges':'', 'details':''}
          $('#add-descrption').modal('hide');
          toastr.success('Expert Descrption Created Successfully.', 'Success Alert', {timeOut: 5000});
      }, (response) => {
          this.formErrors = response.data;
      });
   }
  }

});

</script>
@endsection

