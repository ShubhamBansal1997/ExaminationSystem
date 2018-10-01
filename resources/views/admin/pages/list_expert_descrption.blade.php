@extends('admin.app')
@section('content')
<div id="loading"></div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All Experts Description</h1>
                    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#create-expert" >Add Expert Descrption</button>

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


                                     @foreach($expert_descrption as $i => $expert)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $expert->first_name }} {{ $expert->last_name }}</td>
                                      <td>{{ $expert->phone_number }}</td>
                                      <td>{{ $expert->email_id }}</td>
                                      <td><a href="{{ URL::to('images/id_proof_expert/') }}/{{$expert->id_proof_file}}" target="_blank">{{ $expert->id_proof_number }}</td>

                                      <td>
                                      <button data-id="{{ $expert->id }}" class="btn btn-xs btn-danger"
                                          v-on:click.prevent="addDescrption($event)">ADD</button>
                                      <button data-id="{{ $expert->id }}" class="btn btn-xs btn-danger">DELETE</button>
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
                                                <input type="text" name="first_name" class="form-control" v-model="fillExpert.first_name">
                                                <span v-if="formErrorsUpdate['first_name']" class="error text-danger">@{{ formErrorsUpdate['title'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="last_name">Last Name:</label>
                                                <input type="text" name="last_name" class="form-control" v-model="fillExpert.last_name" />
                                                <span v-if="formErrors['last_name']" class="error text-danger">@{{ formErrors['last_name'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="email_id">Email Id:</label>
                                                <input type="text" name="email_id" class="form-control" v-model="fillExpert.email_id" />
                                                <span v-if="formErrors['email_id']" class="error text-danger">@{{ formErrors['email_id'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="phone_number">Phone Number:</label>
                                                <input type="text" name="phone_number" class="form-control" v-model="fillExpert.phone_number" />
                                                <span v-if="formErrors['phone_number']" class="error text-danger">@{{ formErrors['phone_number'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" name="password" class="form-control" />
                                                <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="id_proof_number">Id Proof Number:</label>
                                                <input type="text" name="id_proof_number" class="form-control" v-model="fillExpert.id_proof_number" />
                                                <span v-if="formErrors['id_proof_number']" class="error text-danger">@{{ formErrors['id_proof_number'] }}</span>
                                              </div>

                                              <div class="form-group">
                                                <label for="id_proof_file">ID Proof File:</label>
                                                <input type="file" name="id_proof_file" class="form-control" />
                                                <span v-if="formErrors['id_proof_file']" class="error text-danger">
                                                @{{ formErrors['id_proof_file'] }}</span>
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
Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({
  el: 'body',

  data: {
    experts: [],
    formErrors:{},
    formErrorsUpdate:{},
    newExpert: {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':''},
    fillExpert: {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'','id':'' },
  },

  methods: {
    createExpert: function(){
      var myForm = document.getElementById('myForm');
      formData = new FormData(myForm);
      //var input = JSON.stringify(this.newExpert);
      this.$http.post('/admin/createexpert', formData).then((response) => {
          this.newExpert = {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':''};
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
      this.$http.get('/admin/getexperts/'+id).then((response) => {
          this.fillExpert.id = response.data.id;
          this.fillExpert.first_name = response.data.first_name;
          this.fillExpert.last_name = response.data.last_name;
          this.fillExpert.phone_number = response.data.phone_number;
          this.fillExpert.email_id = response.data.email_id;
          this.fillExpert.id_proof_number = response.data.id_proof_number;
          $("#edit-expert").modal('show');
        });
      console.log(this.fillExpert);

    },

    updateExpert: function(id){
        var myForm = document.getElementById('myForm2');
        formData = new FormData(myForm);
        this.$http.put('/admin/updateexpert/'+id,formData).then((response) => {
            //this.changePage(this.pagination.current_page);
            this.fillExpert = {'first_name':'', 'last_name':'', 'phone_number':'', 'email_id':'', 'password':'', 'id_proof_number':'', 'id_proof_file':'','id':''};
            toastr.success('Expert Updated Successfully.', 'Success Alert', {timeOut: 5000});
            location.reload();
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },

    addDescrption: function(event){
      element = event.currentTarget
      id = element.getAttribute('data-id');
      $("#edit-x")

    }
  }

});

</script>
@endsection

