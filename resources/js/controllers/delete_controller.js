import axios from 'axios';
import Swal from 'sweetalert2';
import { Controller } from 'stimulus';

export default class extends Controller {
  /**
   * Remove the specified resource from storage.
   *
   * @param {object} event
   */
  destroy(event) {
    event.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      focusConfirm: false,
      buttonsStyling: false,
      confirmButtonText: 'Yes, detach it!',
      cancelButtonText: 'No, cancel!',
      customClass: {
        confirmButton: 'cursor-pointer tracking-wider font-medium text-white focus:outline-none bg-red-600 hover:bg-red-500 mx-2 px-4 py-2 border-2 border-transparent rounded shadow',
        cancelButton: 'cursor-pointer tracking-wider font-medium text-gray-800 bg-gray-200 hover:bg-gray-100 mx-2 px-4 py-2 border-2 border-transparent rounded shadow'
      }
    }).then(result => {
      if (! result.value) {
        return;
      }

      axios.delete(this.data.get('endpoint'))
        .then(response => {
          if (response.status !== 200) {
            this.notification({
              icon: 'error',
              title: 'Something went wrong!'
            });

            return;
          }

          this.element.parentNode.removeChild(this.element);
          this.notification({
            icon: 'success',
            title: 'The record was removed'
          });
        })
        .catch(error => console.error(error.message));
      })
      .catch(error => console.error(error.message));
  }

  /**
   * toast notification.
   * @param  {...any} args
   */
  notification(...args) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
      }
    });

    return Toast.fire(...args);
  }
}
