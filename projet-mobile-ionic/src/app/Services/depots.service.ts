import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DepotsService {
  public baseUrl = environment.baseUrl;
  public depotUrl = '/user/transaction';
  constructor(private http: HttpClient) { }
  // tslint:disable-next-line:typedef
  postDepot(data: any){
    return this.http.post<any>(this.baseUrl + this.depotUrl, data);

  }
}
