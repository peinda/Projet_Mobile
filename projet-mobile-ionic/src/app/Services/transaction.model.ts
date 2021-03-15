export class TransactionModel{
  'montant': number;
  'clientDepot': {
    'nomComplet': string,
    'telephone': string,
    'numCni': string
  };
  'clientRetrait': {
    'nomComplet': string,
    'telephone': string
  };
}
