

  function selectFunction(teacherid) {

    date= String(teacherid).substring(7, 17)
    time= String(teacherid).substring(17, 19)
    teacherid = document.getElementById(teacherid).value;
    studenId = document.getElementById("studenId").value;
    //alert(teacherid)
    const url = `/students/${studenId}/${teacherid}/${date}/${time}/assingTeacher`
   
    document.getElementById("url"+date+time).href = url;

   // const specialtyId = $teacher12.val();
  };