export function clickOnModifyButton(e: any, setNewQuestionIsActive: any, newQuestionIsActive: any) {
    // Enabled or disabled both text input "question" and "answer"
    const parentNode = e.target.parentNode;
    parentNode.querySelector("#userQuestion").disabled = !(parentNode.querySelector("#userQuestion").disabled);
    parentNode.querySelector("#userAnswer").disabled = !(parentNode.querySelector("#userAnswer").disabled);
  
    // Change the modify button text between "Modifier" and "Vérouiller"
    e.target.textContent === "Modifier" ? e.target.textContent = "Vérouiller" : e.target.textContent = "Modifier";
  
    // Display a "save" button
    parentNode.querySelector("#saveButton").hidden = !(parentNode.querySelector("#saveButton").hidden);
  }