window.onload = async function() {
  getModels() 
  var token = localStorage.getItem('token'); 
  let auth=JSON.parse(token)
  if (auth.token) { 
      getUser()
  }
};

async function getUser() {
  let data=  document.getElementById('user-section')   
  var element = '<div class="info"><ul class="clearfix"><li><a class="custom" onclick="logout()"><i class="fa-solid fa-right-to-bracket"></i><span class="txt">Logout</span></a></li></ul></div><div class="link-box"><a href="profile.html" class="theme-btn btn-style-one "><span class="btn-title custom custom">My Profile</span></a></div>';
  data.innerHTML=element
}

async function logout(){
  localStorage.removeItem('token')
  location.reload()
}


async function getModels() {
  let data=  document.getElementById('my-models')
  const response = await fetch('http://localhost:3000/public/models?offset=0&limit=6', {
      method: 'GET',
      headers: {
      'Content-Type': 'application/json'
      }
  });
  const resp = await response.json();
  console.log(resp);
  let html=''
  for (let i = 0; i < resp.length; i++) {
      let url='http://localhost:3000/public/'+resp[i].avatar
      var element = '<div class="room-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><div class="inner-box"><div class="image-box"><figure class="image"><a href="model-single.html"><img src='+url+' alt="" title=""></a></figure></div><div class="lower-box"><h4>'+resp[i].Name+'</h4><div class="link-box"><a href="model-single.html" onclick="viewModel('+resp[i].id+')" class="theme-btn btn-style-three"><span class="btn-title custom">View Details</span></a></div></div></div></div>';
      html=html+element;
      if ((resp.length-1)==i) {
          data.innerHTML=html
      }
  }
}

async function filterSelection(e,value){
  let html=''
  var elems = document.querySelectorAll(".active");
  [].forEach.call(elems, function(el) {
      el.classList.remove("active");
      el.classList.add("filter");
  });
  e.target.className += " active";

  if (value=='all') {
    getModels()
   }else{
      let data=  document.getElementById('my-models')
      const response = await fetch('http://localhost:3000/public/modelsbyCategory?Category='+value+'&offset=0&limit=6', {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json'
        }
    });
    const resp = await response.json();
    //console.log(resp);
    if (resp.length>0) {  
        for (let i = 0; i < resp.length; i++) {
          let url='http://localhost:3000/public/'+resp[i].avatar
          var element = '<div class="room-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><div class="inner-box"><div class="image-box"><figure class="image"><a href="model-single.html"><img src='+url+' alt="" title=""></a></figure></div><div class="lower-box"><h4>'+resp[i].Name+'</h4><div class="link-box"><a href="model-single.html?'+resp[i].id+'" onclick="viewModel('+resp[i].id+')"  class="theme-btn btn-style-three"><span class="btn-title custom">View Details</span></a></div></div></div></div>';
          html=html+element;
          if ((resp.length-1)==i) {
              data.innerHTML=html
          }
      }
    }else{
        data.innerHTML=''
    }
  }
}

async function viewModel(value){
  localStorage.setItem('modelId',value );
}

