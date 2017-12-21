function check(f){
 if (!f.uid.value){
 	alert("아이디를 입력해주세요"); 
 	f.uid.focus();
 	retrun false;
 }
 if (!f.upw.value){
 	alert("비밀번호를 입력해주세요"); 
 	f.upw.focus();
 	retrun false;
 }
 if (!f.name.value){
 	alert("이름을 입력해주세요"); 
 	f.name.focus();
 	retrun false;
 }
 if (!f.level.value){
 	alert("레벨을 입력해주세요"); 
 	f.level.focus();
 	retrun false;
 }
 if (!f.post.value||!f.add_2.value||!f.add_1.value){
 	alert("주소를 입력해주세요"); 
 	f.part.focus();
 	retrun false;
 }
 if (!f.part.value){
 	alert("부서를 입력해주세요"); 
 	f.part.focus();
 	retrun false;
 }
 if (!f.posit.value){
 	alert("직책을입력해주세요"); 
 	f.posit.focus();
 	retrun false;
 }
  if (!f.posit.value){
 	alert("전화번호 을입력해주세요"); 
 	f.posit.focus();
 	retrun false;
 }
  if (!f.posit.value){
 	alert("취미를 입력해주세요"); 
 	f.posit.focus();
 	retrun false;
 }
f.submit();

}