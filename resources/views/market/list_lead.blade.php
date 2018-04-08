@extends('market.app')
@section('content')
<div v-if="loading" v-cloak>
    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
    <span>Loading...</span>
  </div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All Leads</h1>

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
                                        <th>Date(Time)</th>
                                        <th>Expert</th>
                                        <th>Market</th>
                                        <th>Charges</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($leads as $i => $lead)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i + 1 }}</td>
                                      <td>{{ $lead->user_name }}</td>
                                      <td>{{ $lead->user_phone }}</td>
                                      <td>{{ $lead->user_email }}</td>
                                      <td>{{ $lead->user_date}} ({{ $lead->user_time }}) </td>
                                      <td>{{ $lead->expert_name }}</td>
                                      <td>{{ $lead->market_name }}</td>
                                      <td>{{ $lead->user_charges }}</td>
                                      <td>{{ $lead->lead_status }}</td>
                                      <td>
                                        <button class="btn btn-xs btn-warning" v-on:Click="change_status({{$lead->id}})">CHANGE STATUS</button>
                                      </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>
                            <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Change Status</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" id="" v-on:submit.prevent="push_change_status()">
                                            <div class="form-group">
                                              <label>Status</label>
                                              <select name="status" class="form-control" v-model='status' required>
                                                
                                                <option value="CANCELLED">CANCELLED</option>
                                                <option value="PAYMENT RECIEVED">PAYMENT RECIEVED</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

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
// Vue.http.options.emulateJSON = true;
// Vue.http.interceptors.push((request, next) => {
//     next((response) => {
//     // modify response
//     response.data = response.json()
//   })
// })
new Vue({
  el: 'body',

  data: {
      id: null,
      modalShow: false,
      market: null,
      StatusModalShow: false,
      status: null
  },

  methods: {
      change_status: function($id) {
          this.id = $id;
          this.StatusModalShow = true;
          $("#statusModal").modal('toggle');
      },
      push_change_status: function() {
          let data = {
              'id': this.id,
              'status': this.status
          }
          this.$http.post('/marketing/change_lead_status', data)
              .then((response) => {
                  this.id = null;
                  this.StatusModalShow = false;
                  this.market = null;
                  this.status = null;
                  $('#statusModal').modal('hide');
                  location.reload();
              })
              .catch((err) => {
                  alert('Some Error with you input');
              })
      }


  }

});

</script>
@endsection

