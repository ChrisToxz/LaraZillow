import {computed, isRef} from 'vue'
import {getValue} from './useGetValue.js'

export const useMonthlyPayment = (total, interestRate, duration) => {
  const monthlyPayment = computed(() => {


    const principal = getValue(total)
    const monthlyInterest = getValue(interestRate) / 100 / 12
    const numberOfPaymentMonths = getValue(duration) * 12

    const x = Math.pow(1 + monthlyInterest, numberOfPaymentMonths)
    var monthly = (principal * x * monthlyInterest)/(x-1)

    return monthly

  })

  const totalPaid = computed(() => {
    return getValue(duration) * 12 * monthlyPayment.value
  })

  const totalInterest = computed(() => totalPaid.value - getValue(total))

  return { monthlyPayment, totalPaid, totalInterest }
}

