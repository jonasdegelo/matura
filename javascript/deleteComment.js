function deleteComment(commentid){
  /**
   * call deleteComment.inc
   */
  $.ajax({
    type: 'post',
    url: 'includes/deleteComment.inc.php',
    datatype: 'json',
    data: {
      commentID: commentid
    },
    complete: function(){
      /**
       * delete comment from screen
       */
      $("#commentLine"+commentid).remove();
      console.log(commentid);
    }
  });
  return false;
}