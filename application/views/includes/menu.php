<script type="text/javascript">
function date_time(id)
{
  date = new Date;
  year = date.getFullYear();
  month = date.getMonth();
  months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
  d = date.getDate();
  day = date.getDay();
  days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
  h = date.getHours();
  if(h<10)
  {
      h = "0"+h;
  }
  m = date.getMinutes();
  if(m<10)
  {
      m = "0"+m;
  }
  s = date.getSeconds();
  if(s<10)
  {
      s = "0"+s;
  }
  result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
  document.getElementById(id).innerHTML = result;
  setTimeout('date_time("'+id+'");','1000');
  return true;
}
</script>

 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/images/favicon.png'); ?>" height="43" width="60" style="margin-right: 10px">BookKeeping</a>
    <div style="color: #007BFF;margin-left: 100px"><h5><?= 'Welcome User '.$this->session->user_name; ?></h5></div>
    <span id="date_time" style="color: #ff8633;margin-left: 60px;padding-bottom: 5px"></span>
    <script type="text/javascript">window.onload = date_time('date_time');</script>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-th-large"></i>
            <span class="nav-link-text">Master</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="<?php echo base_url('book'); ?>">Book</a>
            </li>
            <li>
              <a href="<?php echo base_url('user'); ?>">User</a>
            </li>
          </ul>
        </li>        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Student">
          <a class="nav-link" href="<?php echo base_url('transaction'); ?>">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Transaction</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <!--Search and Logout Option-->
       <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>