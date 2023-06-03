import {isRef} from 'vue'

export const getValue = (value) => {
  return isRef(value) ? value.value : value
}
