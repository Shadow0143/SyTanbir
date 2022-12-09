window.onload = async function() {
    var token = localStorage.getItem('token'); 
    console.log(token);
    let auth=JSON.parse(token)
    console.log(auth);
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