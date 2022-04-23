export function addUiQuestionAndAnswerCouple(
    e:any, 
    setNewQuestionIsActive: (arg0: boolean) => void, 
    newQuestionIsActive: boolean
    ) {
    setNewQuestionIsActive(!newQuestionIsActive)
    e.target.textContent == "Ajouter une question" ? 
      e.target.textContent = "Annuler" : e.target.textContent = "Ajouter une question"
}