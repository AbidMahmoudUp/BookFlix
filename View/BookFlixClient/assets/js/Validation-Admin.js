const schema =joi.object({
    username: joi.string().min(3).max(38).label("Name").required(),

});

function validate(DataObject)
{
    const result = schema.validate(
        {
            ...DataObject,
        },
        {
            aboratEarly:false
        }
    );
    return result;

}

//form
$(document).ready(function(){
    $(".contact-form").on("submit",function(e))
    {
        e.preventDefault();
        const contactForm =this;

        const usernameField = $(contactForm).find('#username');

        const formErrors = validate({
            username : usernameField.val(),
        });

        const initialErrors={
            username:null,
        };
        if(formErrors?.error)
        {
            const{ details}=formErrors.error;
            details.map((detail)=>{
                initialErrors[detail.context.key]=details.message;
            });
        }

        //writting errors on the web page 

        Object.keys(initialErrors).map((errorName)=>{
            if(initialErrors[errorName]!=null)
            {
                $('#${errorName}').
            }
        })
    }
});