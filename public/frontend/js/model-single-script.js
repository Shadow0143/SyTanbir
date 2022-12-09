window.onload = async function() {
    var modelId = localStorage.getItem('modelId'); 
    getModelsbyId(modelId)
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
  async function getModelsbyId(modelId) {
    let data=  document.getElementById('model-data')
    let data1=  document.getElementById('model-data1')
    let data2=  document.getElementById('model-data2')
        const response = await fetch('http://localhost:3000/public/modelsbyid?id='+modelId, {
            method: 'GET',
            headers: {
            'Content-Type': 'application/json'
            }
        });
        const resp = await response.json();
        let url='http://localhost:3000/public/'+resp.avatar
        var element = '<div style="margin-bottom: 50px;display: flex;justify-content: center"><img src='+url+' alt="" title=""/></div><div class="upper-inner"><h2>'+resp.Name+'</h2><div class="text"><p>'+resp.reserve+'</p></div></div>';
        data.innerHTML=element

        var element1 = '<div class="details-inner"><h3>Model Details</h3><div class="text">Personal Description of Model:-</div><ul class="info clearfix"><p><span class="icon flaticon-tv"></span> Born:'+resp.birthday+'</p><p><span class="icon flaticon-wifi"></span> Bio: '+resp.reserve+'</p></ul></div>';
        data1.innerHTML=element1 

        var element2 = '<div class="details-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" id="model-data2"><div class="details-inner"><h3>Address Information</h3><ul class="info clearfix"><li><span class="icon flaticon-tv"></span> City: '+resp.city+'</li><li><span class="icon flaticon-wifi"></span> State: '+resp.state+'</li><li><span class="icon flaticon-coffee-cup"></span> Country: '+resp.country+'</li>  </ul></div></div>';
        data2.innerHTML=element2
  }