<div class="body-container">
<div class="surveys-container">
<div >
            <div class="well">
                   <?php echo ( $this->session->getNotification());?>
                <h3><?php echo $evaluation->titre ?>
           
                </h3>
                    <div>
     
            <?php $i=0 ?>
       
             <form id="reponses-form" class="question form-horizontal" method="post" action="<?php echo BASE_URL."/evaluation/submitResponse"?>">
                     
  <fieldset>
      <!-- Text input-->
      <input type="hidden" name="evaluation_id" value="<?php echo $evaluation->id?>">

      <?php   $nbR = 0 ?>
       <?php foreach($questions as $q){?>
      <div>
      <div class="form-group">
          <label class="control-label" for=""><?php echo ++$i.') '.ucfirst($q->question)?></label>  
      </div>
         
              <div class="form-group">
                
        <?php foreach($responses[$nbR] as $op[$nbR] ){?>  
          
                  
          
          <label class="radio" >
               <input type="radio" required name="q[<?php echo $q->id?>]" value="<?php echo $op[$nbR]->response?>"/>
              <?php echo $op[$nbR]->response?>
          </label>
        
   
        <?php } ?>
        </div>
     <?php   $nbR++; ?>
      </div>
       <?php }?>
      <!-- Textarea -->
     
      <div id="addQuestion" class="form-group col-md-2 pull-right" >
        <input  type="submit" value="valider les réponses" class="btn btn-primary  pull-right" >
      </div>

   </fieldset>
</form>
            
            
            
      
    
        
        
    </div>
            </div>
        </div>



</div>
    
    <script>   $('[data-toggle="popover"]').popover({  container: 'body'});  
    $(document).ready( function(){ 
    $("#reponses-form input").each(function () {
        console.log("test");
  $(this).rules("add", {
    required: true // Or whatever rule you want
  });
});
    });
    </script>