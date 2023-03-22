import { reactive, toRefs } from '@nuxtjs/composition-api'
import Swal from 'sweetalert2'

export default function useSweetAlert() {
  const state = reactive({
    swal: Swal,
  })

  return {
    ...toRefs(state),
  }
}
