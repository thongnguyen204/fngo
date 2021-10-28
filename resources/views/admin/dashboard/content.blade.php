@extends('admin.dashboard.index')

@section('dashboard')

<link href="{{ asset('css/dashboard-content.css') }}" rel="stylesheet">
{{-- char --}}


<div class="container-fluid">
    <h1 class="m-0">Dashboard</h1>
</div>
<div style="margin-left: 0px" class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-user">
                <div class="inner">
                    <h3>{{$countUser}}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <a href="{{route('users.index')}}" class="small-box-footer">
                    More info
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-newUser">
                <div class="inner">
                    <h3>{{$countNewUser}}</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-order">
                <div class="inner">
                    <h3>{{$countWaitingOrders}}</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$countPaidOrdersToday}}</h3>
                    <p>Success orders</p>
                </div>
                <div class="icon">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-pie-chart-fill"></i>
                        Accounts: {{$countAllUser}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div >
                            <canvas id="userChart" style=""></canvas>
                            <input type="hidden" id="countUser" value="{{$countUser}}">
                            <input type="hidden" id="countEmployee" value="{{$countEmployee}}">
                            <input type="hidden" id="countAdmin" value="{{$countAdmin}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-pie-chart-fill"></i>
                        Accounts: {{$countAllUser}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div style="min-height: 300px">
                            <canvas id="incomeChart" style=""></canvas>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- char --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const user = $( "#countUser" ).val();
const employee = $( "#countEmployee" ).val();
const admin = $( "#countAdmin" ).val();

 data = {
  labels: ['User', 'Employee', 'Admin'],
  datasets: [
    {
      label: 'Dataset 1',
      data: [user,employee,admin],
      backgroundColor: ['#1B98F5', '#E8BD0D','Red'],
    }
  ]
};

 config = {
  type: 'doughnut',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: false,
        text: 'Chart.js Doughnut Chart'
      }
    }
  },
};

 myChart = new Chart(
    document.getElementById('userChart'),
    config
  );



</script>

<script>
     labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
];
 data = {
  labels: labels,
  datasets: [{
    label: 'My First dataset',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [0, 10, 5, 2, 20, 30, 45],
  }]
};
 config = {
  type: 'line',
  data: data,
  options: {}
};
  // === include 'setup' then 'config' above ===

   myChart = new Chart(
    document.getElementById('incomeChart'),
    config
  );
</script>



@endsection