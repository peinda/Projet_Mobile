import { TestBed } from '@angular/core/testing';

import { DepotsService } from './depots.service';

describe('DepotsService', () => {
  let service: DepotsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DepotsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
