// window.addEventListener('show-login', event => {
//     alert('Name updated to: ');
//     console.log(event);
// })

window.addEventListener('load', (event) => {
    let el = document.getElementById('aside_edit_bar');
    if(el)
        el.classList.remove('hidden');
});

window.addEventListener('close_sidebar', event => {
    document.getElementById('btn_sidebar_close').click();
})

window.addEventListener('edit_product_click', event => {
    closeModal('modal-overlay');
    document.getElementById('add_edit_product_link').click();
})

window.addEventListener('edit_job_click', event => {
    closeModal('modal-overlay');
    document.getElementById('add_edit_job_link').click();
})

window.addEventListener('edit_giveaway_click', event => {
    closeModal('modal-overlay');
    document.getElementById('add_edit_giveaway_link').click();
})

window.addEventListener('open_product_modal', event => {
    
    let heading = document.getElementById('pd_heading');
    heading.innerHTML = event.detail.name;

    let description = document.getElementById('pd_description');
    description.innerHTML = event.detail.description;

    let price = document.getElementById('pd_price');

    let price_text = '';
    if(event.detail.price != null)
        price_text = '$'+event.detail.price;
    if(event.detail.price_sale != null)
        price_text = '<i class="text-red-500 line-through">$'+ event.detail.price +'</i> &nbsp; $'+event.detail.price_sale;   
        
    price.innerHTML = price_text;    

    let link = document.getElementById('pd_link');
    if(event.detail.link != null)
    {
        link.innerHTML = '<a href="'+ event.detail.link +'" target="_blank" class="text-blue-500"><i class="fas fa-link"></i> Click to see full details</a>';
    }

    let main_image = document.getElementById('pd_main_image');
    main_image.src = '/up_data/'+event.detail.image1;
    
    let thumb1 = document.getElementById('pd_thumb1');
    thumb1.src = '/up_data/'+event.detail.image1;
    
    if(event.detail.image2 != null && event.detail.image2 != '')
    {
        document.getElementById('div_thumb2').style.display = '';
        let thumb2 = document.getElementById('pd_thumb2');
        thumb2.src = '/up_data/'+event.detail.image2;
    }
    else document.getElementById('div_thumb2').style.display = 'none';

    if(event.detail.image3 != null && event.detail.image3 != '')
    {
        document.getElementById('div_thumb3').style.display = '';
        let thumb3 = document.getElementById('pd_thumb3');
        thumb3.src = '/up_data/'+event.detail.image3;
    }
    else document.getElementById('div_thumb3').style.display = 'none';

    openModal('product-detail-modal');
})

window.addEventListener('open_job_modal', event => {
    
    let heading = document.getElementById('job_heading');
    heading.innerHTML = event.detail.name;

    let description = document.getElementById('job_description');
    description.innerHTML = event.detail.description;

    let link = document.getElementById('job_link');
    if(event.detail.link != null)
    {
        link.innerHTML = '<a href="'+ event.detail.link +'" target="_blank" class="text-blue-500"><i class="fas fa-link"></i> Click to see full details</a>';
    }

    let category = document.getElementById('job_category');
    if(event.detail.category_name != null)
    {
        category.innerHTML = 'Posted in: <span class="text-gray-500 font-bold">'+ event.detail.category_name +'</span>';
    }

    let main_image = document.getElementById('job_main_image');
    main_image.src = '/up_data/'+event.detail.image1;

    openModal('job-detail-modal');
})

window.addEventListener('open_giveaway_modal', event => {
    
    console.log(event);

    let heading = document.getElementById('gv_heading');
    heading.innerHTML = event.detail.name;

    let description = document.getElementById('gv_description');
    description.innerHTML = event.detail.description;

    let link = document.getElementById('gv_link');
    if(event.detail.link != null)
    {
        link.innerHTML = '<a href="'+ event.detail.link +'" target="_blank" class="text-blue-500"><i class="fas fa-link"></i> Click to see the details</a>';
    }

    let main_image = document.getElementById('giveaway_main_image');
    main_image.src = '/up_data/'+event.detail.image1;

    openModal('giveaway-detail-modal');
})

window.addEventListener('scroll-chat-to-end', event => {
    let chat_service = document.querySelector('.chat-services');
    chat_service.scrollTop = chat_service.scrollHeight;
})

const setActiveChat = (el) => {
    let links = document.querySelectorAll('.rhs-chats-list');
    for (let i = 0; i < links.length; i++) {
        links[i].classList.remove('bg-gray-200');
    }
    el.classList.add('bg-gray-200');
}

const scrollToEl = (el) => {
    document.getElementById(el).scrollIntoView({ behavior: 'smooth', block: 'center' });
}

const setTumbnail = (src) => {
    let main_image = document.getElementById('pd_main_image');
    main_image.src = src;
}

const closeModal = (modal) => {
    const modalToClose = document.querySelector('.'+modal);
    modalToClose.classList.remove('fadeIn');
    modalToClose.classList.add('fadeOut');
    modalToClose.style.display = 'none';
}

const openModal = (modal) => {
    const modalToOpen = document.querySelector('.'+modal);
    modalToOpen.classList.remove('fadeOut');
    modalToOpen.classList.add('fadeIn');
    modalToOpen.style.display = 'flex';
}

const chatModal = document.querySelector('.chat-modal');
const chatServices = document.querySelector('.chat-services');

const showChat = document.querySelector('.show-chat');
const closeChat = document.querySelector('.close-chat');

if(showChat)
{
    showChat.addEventListener('click', function (){
        chatModal.classList.add('show')
        showChat.classList.add('hidden')
        const event = new CustomEvent('scroll-chat-to-end');
        window.dispatchEvent(event);
        
        // setTimeout(() => {
        // chatServices.classList.add('expand')
        // }, 500);
    });
    closeChat.addEventListener('click',function () {
        setTimeout(() => {
        showChat.classList.remove('hidden')
        }, 820);
        // chatServices.classList.remove('expand')
        setTimeout(() => {
        chatModal.classList.remove('show')
        }, 500);
    });
    
    setInterval(() => {
        Livewire.emit('popupMessageSent');
        //alert('hello');
        }, 5000);
}
