

let $teacher12;

  function selectFunction(teacherid) {
    //alert(teacherid)
    dia= String(teacherid).substring(7, 9)
    hora= String(teacherid).substring(9, 11)
    teacherid = document.getElementById(teacherid).value;
    

    const url = `/students/52/${teacherid}/${dia}/${hora}/assingTeacher`
    alert(url)
    document.getElementById("url12").href = url;

   // const specialtyId = $teacher12.val();
  };