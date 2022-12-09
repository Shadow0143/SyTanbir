window.onload = async function() {
  getBlogs() 
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
  async function getBlogs() {
    let data=  document.getElementById('my-blog')
    const response = await fetch('http://localhost:3000/public/blog?offset=0&limit=6', {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json'
        }
    });
    const resp = await response.json();
   // console.log(resp);
    let html=''
    for (let i = 0; i < resp.length; i++) {
        let url='http://localhost:3000/public/'+resp[i].cover
        var element = '<div class="news-block-four wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><div class="inner-box"><div class="image-box"><figure class="image"><a href="blog-single.html" onclick="viewBlog('+resp[i].id+')"><img src='+url+' alt="" title=""></a></figure></div><div class="lower-box"><div class="date"><span class="day">'+resp[i].date.split('-')[2]+'</span>'+resp[i].date.split('-')[1]+'</div><div class="post-meta"><ul class="clearfix"><li><a href="#"><span>'+resp[i].author+'</span></a></li><li><a href="#"><span>'+resp[i].category+'</span></a></li></ul></div><h3><a href="blog-single.html" onclick="viewBlog('+resp[i].id+')">'+resp[i].title+'</a></h3><div class="text">'+resp[i].content.substring(0, 100)+'...</div><div class="link-box"><a class="custom" href="blog-single.html" onclick="viewBlog('+resp[i].id+')"><i class=" icon fa-solid fa-arrow-right"></i></span>Read More</a></div></div></div></div>';
        html=html+element;
        if ((resp.length-1)==i) {
            data.innerHTML=html
        }
    }
  }
  
  async function filterSelection(value){
    let html=''
    if (value=='all') {
      getBlogs()
     }else{
        let data=  document.getElementById('my-blog')
        const response = await fetch('http://localhost:3000/public/blogByCategory?category='+value+'&offset=0&limit=6', {
          method: 'GET',
          headers: {
          'Content-Type': 'application/json'
          }
      });
      const resp = await response.json();
     // console.log(resp);
      if (resp.length>0) {  
          for (let i = 0; i < resp.length; i++) {
            let url='http://localhost:3000/public/'+resp[i].cover
            var element = '<div class="news-block-four wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><div class="inner-box"><div class="image-box"><figure class="image"><a href="blog-single.html" onclick="viewBlog('+resp[i].id+')"><img src='+url+' alt="" title=""></a></figure></div><div class="lower-box"><div class="date"><span class="day">'+resp[i].date.split('-')[2]+'</span>'+resp[i].date.split('-')[1]+'</div><div class="post-meta"><ul class="clearfix"><li><a href="#"><span>'+resp[i].author+'</span></a></li><li><a href="#"><span>'+resp[i].category+'</span></a></li></ul></div><h3><a href="blog-single.html" onclick="viewBlog('+resp[i].id+')">'+resp[i].title+'</a></h3><div class="text">'+resp[i].content.substring(0, 100)+'...</div><div class="link-box"><a class="custom" href="blog-single.html" onclick="viewBlog('+resp[i].id+')"><i class=" icon fa-solid fa-arrow-right"></i></span>Read More</a></div></div></div></div>';
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
  
  async function viewBlog(value){
   // console.log(value);
    localStorage.setItem('blogId',value);
  }

  // async function filterSelection(value){
  //   console.log(value);
  // }